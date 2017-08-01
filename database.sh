#!/bin/bash

now_time="$(date +'%d_%m_%Y_%H_%M_%S')"
filename="db_backup_$now_time".gz
folder="​/opt/backups/database"

db_user="user_name"
db_pass="password"
database="b2b"
current_user="user"

file="$folder/$filename"
mysqldump --user="$db_user" --password="$db_pass" --default-character-set=utf8 "$database" | gzip > "$file"
chown "$current_user" "$file"
exit 0