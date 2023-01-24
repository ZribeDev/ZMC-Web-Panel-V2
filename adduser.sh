#!/bin/bash
if [ "$1" == "add-user" ]; then
    echo "Enter new username:"
    read username
    if grep -qo "\$logins\['$username'\]" creds.php; then
        echo "User $username already exists"
    else
        echo "Enter new password:"
        read password
        echo "<?php \$logins['$username'] = '$password'; ?>" >> creds.php
        echo "User $username added to creds.php"
    fi

else
    echo "Invalid argument, expected 'add-user'"
fi
