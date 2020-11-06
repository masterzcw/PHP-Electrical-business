#!/usr/bin/env bash
date >> /root/456.txt
rm -rf '/var/www/html/index.html'
cp '/var/www/html/index_sale.html' '/var/www/html/index.html'
