#!/bin/bash
# One-click pull for Learn Hub staging server
# Joseph: run this script to update staging with latest changes

cd /home/staginggm/public_html/learn-hub || cd /var/www/html/learn-hub || cd /var/www/learn-hub
git pull origin main
echo ""
echo "Pull complete. Learn Hub updated on staging."
