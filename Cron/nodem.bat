if not "%minimized%"=="" goto :minimized
set minimized=true
@echo off
cd C:\xampp\htdocs\performanceReports\DailyPerformanceReports\Main

start /min cmd /C "node main.mjs"
goto :EOF
:minimized
