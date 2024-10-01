import fs from "fs";
import axios from "axios";
import { Connection, Request, TYPES } from "tedious";
import path from "path";
import winston from "winston";
import lighthouse from 'lighthouse';
import * as chromeLauncher from 'chrome-launcher';

// Configure winston logger
const logger = winston.createLogger({
  level: 'info',
  format: winston.format.combine(
    winston.format.timestamp(),
    winston.format.json()
  ),
  transports: [
    new winston.transports.Console(),
    new winston.transports.File({ filename: 'app.log' })
  ]
});

const config = {
  server: 'DELAWALLADESK07\\SQLEXPRESS',
  authentication: {
    type: 'default',
    options: {
      userName: 'Mustafa',
      password: '123'
    }
  },
  options: {
    encrypt: true,
    database: 'websitestats',
    trustServerCertificate: true
  }
};

// Function to insert data into SQL Server
function insertData(name, location, v1, v2, v3, v4, v5, v6, v7, v8, v9) {
  logger.info("Inserting data into Table...");

  const connection = new Connection(config);
  connection.on('connect', err => {
    if (err) {
      logger.error('Database connection failed:', err);
    } else {
      const request = new Request(
        'INSERT INTO logs (Url_Tested, MobilePerformance, MobileAccessibility, MobileBestPractices, MobileSeo, DesktopPerformance, DesktopAccessibility, DesktopBestPractices, DesktopSeo, Mobile_Diagnostics, Desktop_Diagnostics) VALUES (@Name, @Location, @v1, @v2, @v3, @v4, @v5, @v6, @v7, @v8, @v9);',
        (err, rowCount) => {
          if (err) {
            logger.error('Error inserting data:', err);
          } else {
            logger.info(`${rowCount} row(s) inserted`);
          }
          connection.close();
        }
      );

      request.addParameter('Name', TYPES.NVarChar, name);
      request.addParameter('Location', TYPES.NVarChar, location);
      request.addParameter('v1', TYPES.NVarChar, v1);
      request.addParameter('v2', TYPES.NVarChar, v2);
      request.addParameter('v3', TYPES.NVarChar, v3);
      request.addParameter('v4', TYPES.NVarChar, v4);
      request.addParameter('v5', TYPES.NVarChar, v5);
      request.addParameter('v6', TYPES.NVarChar, v6);
      request.addParameter('v7', TYPES.NVarChar, v7);
      request.addParameter('v8', TYPES.NVarChar, v8);
      request.addParameter('v9', TYPES.NVarChar, v9);

      connection.execSql(request);
    }
  });
}

// Function to clear the log directory
function clearLogDirectory(logDirectory) {
  if (fs.existsSync(logDirectory)) {
    fs.readdirSync(logDirectory).forEach(file => {
      const curPath = path.join(logDirectory, file);
      if (fs.lstatSync(curPath).isDirectory()) {
        clearLogDirectory(curPath);
      } else {
        fs.unlinkSync(curPath);
      }
    });
  }
}

const array = fs.readFileSync("URLs.csv").toString().split("\n");
fs.writeFile('lhreport.csv', '', function () { logger.info('Initialized lhreport.csv') });

let result = [];
result.push("URL, Mobile_Performance, Mobile_Accessibility, Mobile_Best_Practices, Mobile_SEO, M_FCP, M_LCP, M_CLS, M_TBT, M_TTI, M_SI, MDOM_Size, Desktop_Performance, Desktop_Accessibility, Desktop_Best_Practices, Desktop_SEO, D_FCP, D_LCP, D_CLS, D_TBT, D_TTI, D_SI, DDOM_Size, Mobile_Diagnostics, Desktop_Diagnostics");

const diagnosticsAudits = [
  "unminified-css",
  "unminified-javascript",
  "unused-css-rules",
  "uses-optimized-images",
  "uses-responsive-images",
  "offscreen-images",
  "uses-webp-images",
  "uses-lazy-loading",
  "unsized-images",
  "modern-image-formats"
];

// Function to fetch metrics from PageSpeed Insights API
async function getPageSpeedMetrics(url, strategy) {
  const apiKey = 'AIzaSyDDVN-SurB5e5li1fVOmN8m8HGgNr-LPNc';  // Replace with your actual API Key
  const apiUrl = `https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${url}&strategy=${strategy}&key=${apiKey}`;

  try {
    const response = await axios.get(apiUrl);
    const data = response.data.lighthouseResult.audits;

    return {
      fcp: data["first-contentful-paint"].displayValue,
      lcp: data["largest-contentful-paint"].displayValue,
      cls: data["cumulative-layout-shift"].displayValue,
      tbt: data["total-blocking-time"].displayValue,
      tti: data["interactive"].displayValue,
      si: data["speed-index"].displayValue
    };
  } catch (error) {
    logger.error(`Error fetching PageSpeed metrics for ${url}:`, error.message);
    return null;
  }
}

// Run Lighthouse for metrics, combining Lighthouse and PageSpeed data
async function getLighthouseMetrics(url, strategy) {
  const chrome = await chromeLauncher.launch({ chromeFlags: ["--headless"] });
  const options = {
    logLevel: "info",
    output: "html",
    onlyCategories: ['performance', 'accessibility', 'best-practices', 'seo'],
    port: chrome.port,
    formFactor: strategy,
    throttlingMethod: 'simulate',
    screenEmulation: strategy === 'mobile' ? {
      mobile: true,
      width: 375,
      height: 667,
      deviceScaleFactor: 2,
      disabled: false
    } : {
      mobile: false,
      width: 1920,
      height: 1080,

      deviceScaleFactor: 1
      
    },
     throttling: strategy === 'desktop' ? {
      cpuSlowdownMultiplier: 1, // Improved performance for desktop
      rttMs: 20,                // Slightly realistic round-trip time
      throughputKbps: 10240,     // Moderate bandwidth for real-world desktop experience
      requestLatencyMs: 0,       // No request latency
      downloadThroughputKbps: 0,
      uploadThroughputKbps:0,
    } : undefined
  };

  const runnerResult = await lighthouse(url, options);
  await chrome.kill();

  // Fetch key metrics using PageSpeed API
  const pageSpeedMetrics = await getPageSpeedMetrics(url, strategy);
  return { lighthouse: runnerResult.lhr, pageSpeedMetrics };
}

function generateHtmlReport(url, lhr, diagnosticsMessages) {
  return `
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Report for ${url}</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #ecf0f1;
            --text-color: #34495e;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        
        h1, h2 {
            color: var(--secondary-color);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .url {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }
        
        .section {
            margin-bottom: 40px;
        }
        
        .section h2 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .metric-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .metric-card:hover {
            transform: translateY(-5px);
        }
        
        .metric-name {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .metric-value {
            font-size: 24px;
            font-weight: bold;
        }
        
        .score {
            font-size: 36px;
            font-weight: bold;
        }
        
        .score.green { color: var(--success-color); }
        .score.yellow { color: var(--warning-color); }
        .score.red { color: var(--danger-color); }
        
        .diagnostics-list {
            list-style: none;
            padding: 0;
        }
        
        .diagnostics-list li {
            background-color: #fdf2f2;
            border-left: 5px solid var(--danger-color);
            color: var(--danger-color);
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 4px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .metrics-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> Report for <a href="${url}" target="_blank" class="url">${url}</a></h1>
        
        <div class="section">
            <h2>Performance Metrics</h2>
            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-name">Performance</div>
                    <div class="score ${getScoreColor(lhr.categories.performance.score * 100)}">${(lhr.categories.performance.score * 100).toFixed(0)}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Accessibility</div>
                    <div class="score ${getScoreColor(lhr.categories.accessibility.score * 100)}">${(lhr.categories.accessibility.score * 100).toFixed(0)}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Best Practices</div>
                    <div class="score ${getScoreColor(lhr.categories["best-practices"].score * 100)}">${(lhr.categories["best-practices"].score * 100).toFixed(0)}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">SEO</div>
                    <div class="score ${getScoreColor(lhr.categories.seo.score * 100)}">${(lhr.categories.seo.score * 100).toFixed(0)}</div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <h2>Core Web Vitals</h2>
            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-name">First Contentful Paint</div>
                    <div class="metric-value">${lhr.audits["first-contentful-paint"].displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Largest Contentful Paint</div>
                    <div class="metric-value">${lhr.audits["largest-contentful-paint"].displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Cumulative Layout Shift</div>
                    <div class="metric-value">${lhr.audits["cumulative-layout-shift"].displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Total Blocking Time</div>
                    <div class="metric-value">${lhr.audits["total-blocking-time"].displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Time to Interactive</div>
                    <div class="metric-value">${lhr.audits.interactive.displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">Speed Index</div>
                    <div class="metric-value">${lhr.audits["speed-index"].displayValue}</div>
                </div>
                <div class="metric-card">
                    <div class="metric-name">DOM Size</div>
                    <div class="metric-value">${lhr.audits["dom-size"].numericValue}</div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <h2>Diagnostics</h2>
            <ul class="diagnostics-list">
                ${diagnosticsMessages.map(message => `<li>${message}</li>`).join('')}
            </ul>
        </div>
    </div>
</body>
</html>
  `;
}

function getScoreColor(score) {
  if (score >= 90) return 'green';
  if (score >= 50) return 'yellow';
  return 'red';
}

function formatBytesToKib(bytes) {
  return (bytes / 1024).toFixed(2) + ' KiB';
}

(async () => {
  const logDirectory = 'logs';
  clearLogDirectory(logDirectory); // Clear the log directory at the start

  for (const url of array) {
    let mobileDiagnosticsFound = false;
    let desktopDiagnosticsFound = false;

    for (let x = 0; x < 2; x++) {
      let strategy = x === 0 ? "mobile" : "desktop";
      let filenameSuffix = x === 0 ? '_m' : '_d';

      try {
        const { lighthouse, pageSpeedMetrics } = await getLighthouseMetrics(url, strategy);
        if (!lighthouse || !pageSpeedMetrics) continue;

        const lhr = lighthouse;

        if (x === 0) {
          result.push("\n");
          result.push(lhr.finalUrl);
        }

        const categories = ['performance', 'accessibility', 'best-practices', 'seo'];
        categories.forEach(category => {
          result.push(lhr.categories[category] && lhr.categories[category].score !== null ? lhr.categories[category].score * 100 : "NA");
        });

        // Insert PageSpeed Metrics
        result.push(pageSpeedMetrics.fcp || "NA");
        result.push(pageSpeedMetrics.lcp || "NA");
        result.push(pageSpeedMetrics.cls || "NA");
        result.push(pageSpeedMetrics.tbt || "NA");
        result.push(pageSpeedMetrics.tti || "NA");
        result.push(pageSpeedMetrics.si || "NA");

        const domSizeMetric = lhr.audits['dom-size'];
        result.push(domSizeMetric && domSizeMetric.numericValue ? domSizeMetric.numericValue : "NA");

        const sanitizedUrl = url.replace(/[^a-zA-Z ]/g, "");
        const urlObject = new URL(url);
        let folderName = urlObject.hostname.replace(/^https?:\/\/(www\.)?/, '');

        if (!fs.existsSync('logs/' + folderName)) {
          fs.mkdirSync('logs/' + folderName);
          logger.info('logs/' + folderName);
        }

        // Handle diagnostics check for both mobile and desktop
        let diagnostics = "fixed";
        let diagnosticsMessages = [];
        diagnosticsAudits.forEach(audit => {
          if (lhr.audits[audit] && lhr.audits[audit].details && lhr.audits[audit].details.items && lhr.audits[audit].details.items.length > 0) {
            diagnostics = "issue";
            diagnosticsMessages.push(`${audit}: ${lhr.audits[audit].details.items.map(item => item.url || JSON.stringify(item)).join(', ')}`);
          }
        });

        // Log diagnostics
        if (diagnostics === "issue") {
          diagnosticsMessages.forEach(message => logger.info(`Diagnostic issue: ${message}`));
          if (x === 0) {
            mobileDiagnosticsFound = true;
          } else {
            desktopDiagnosticsFound = true;
          }
        }

        // Save HTML report only if issues are found
        if (mobileDiagnosticsFound || desktopDiagnosticsFound || (lhr.categories.performance.score * 100 < 50)) {
          const htmlReport = generateHtmlReport(url, lhr, diagnosticsMessages);
          logger.info('Saving report for ' + url);
          fs.writeFileSync(`logs/${folderName}/${sanitizedUrl.replace('httpswww', '')}${filenameSuffix}--.html`, htmlReport);
        }

        logger.info(`Lighthouse and PageSpeed data for ${url} (${strategy}) collected successfully.`);

      } catch (error) {
        logger.error(`Error processing ${url}:`, error.message);
      }
    }

    result.push(mobileDiagnosticsFound ? 'Issue' : 'Fixed');
    result.push(desktopDiagnosticsFound ? 'Issue' : 'Fixed');

    try {
      fs.appendFileSync("lhreport.csv", result.toString());
    } catch (error) {
      logger.error(error);
    }

    result = [];
  }

  const urls = [
    'http://localhost:80/performanceReports/DailyPerformanceReports/Main/index.php',
    'http://localhost:80/performanceReports/DailyPerformanceReports/Main/zip.php',
    'http://localhost:80/performanceReports/DailyPerformanceReports/MailPhp/sendmail4.php',
    'http://localhost:80/performanceReports/DailyPerformanceReports/Main/delete.php',
  ];

  for (const url of urls) {
    const option = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name: 'John Doe',
        job: 'Content Writer',
      }),
    };

    try {
      const response = await fetch(url, option);

      const contentType = response.headers.get('content-type');
      let responseBody;

      if (contentType && contentType.includes('application/json')) {
        responseBody = await response.json();
      } else {
        responseBody = await response.text();
      }

      logger.info(`Status: ${response.status}`);
      logger.info(responseBody);
    } catch (err) {
      logger.error(err);
    }
  }
})();
