.env.local file : 

APP_ENV=dev
APP_DEBUG=1
APP_SECRET=1b64f1f964857fdfcff30e9226c26080

DATABASE_URL="mysql://root:root@localhost:3306/symfvue"
CORS_ALLOW_ORIGIN='^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$'

JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=35dcb9dad650afba71c7a7aa7e7b4c3c
