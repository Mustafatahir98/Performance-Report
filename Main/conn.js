import fs from 'fs';

const myUrl = 'https://www.kindacode.com/article/how-to-get-all-links-from-a-webpage-using-node-js/';
const urlObject = new URL(myUrl);
const hostName = urlObject.hostname;
const folderName = hostName.replace(/^[^.]+\./g, '');

try {
  if (!fs.existsSync(`logs/${folderName}`)) {
    fs.mkdirSync(`logs/${folderName}`);
  }
} catch (err) {
  console.error(err);
}
