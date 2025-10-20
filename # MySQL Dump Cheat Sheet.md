# MySQL Dump Cheat Sheet

## 1. SSH into server
ssh forge@123.45.67.89

## 2. Create database dump
mysqldump -u forge -p --single-transaction fol_dbase > backup.sql

<!-- backup_20251001_143022.sql -->
mysqldump -u forge -p --single-transaction fol_dbase > fol_$(date +%Y%m%d_%H%M%S).sql

<!-- backup_20251001_151045.sql -->
mysqldump -u forge -p --single-transaction fol_dbase > fol_$(date +%Y%m%d).sql



## 3. Download to your computer
scp forge@123.45.67.89:/home/forge/backup.sql .\

## Optional: Compress the dump
mysqldump -u forge -p --single-transaction fol_dbase | gzip > backup.sql.gz

## Download compressed file
scp forge@123.45.67.89:/home/forge/backup.sql.gz .\


