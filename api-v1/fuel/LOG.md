# Migration
- Create users
```
php oil generate migration create_users username:string[255] password:string[255] group:int[11] email:string[255] last_login:int[11] login_hash:string[255] profile_fields:text created_at:int[11] updated_at:int[11]
```
