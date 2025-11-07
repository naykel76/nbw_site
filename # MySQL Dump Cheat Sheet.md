# MySQL Dump Cheat Sheet

## 1. SSH into server
ssh forge@123.45.67.89

## 2. Create database dump
<!-- backup.sql () -->
mysqldump -u forge -p --single-transaction fol_dbase > ~/backup.sql

<!-- backup_20251001_143022.sql -->
mysqldump -u forge -p --single-transaction fol_dbase > ~/fol_$(date +%Y%m%d_%H%M%S).sql



select directory or it will 


## 3. Download to your computer
scp forge@170.187.240.29:/home/forge/backup.sql .\









# Save to your home directory
mysqldump -u forge -p --single-transaction fol_dbase > ~/backup.sql

# Save to a specific backups folder
mysqldump -u forge -p --single-transaction fol_dbase > /home/forge/backups/backup-$(date +%Y%m%d).sql

# Save to your project's storage folder
mysqldump -u forge -p --single-transaction fol_dbase > /home/forge/your-project/storage/backup.sql