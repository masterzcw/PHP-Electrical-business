#!/usr/bin/env bash
date >> /root/456.txt
rm -rf '/alidata/www/deault/index.html'
cp '/alidata/www/deault/index_sale.html' '/alidata/www/deault/index.html'
# 切换页面, 从等待切换到开始抢购