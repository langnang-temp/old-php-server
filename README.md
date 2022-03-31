# PHP Server

- `Router` nikic/fast-route
- `SQL` doctrine/dbal
- `ApiDoc` zircote/swagger-php
- `FileSystem` league/flysystem
- `Request` rmccue/requests
- `FakeData` fakerphp/faker
- `FTP` nicolab/php-ftp-client

## Branches

```sh
┌──────────────────────┐       ┌─────────────────────────────┐       ┌───────────┐       ┌──────────┐
|                      |       |                             |       |           |       |          |
|  @langnang-temp/php  | ====> |  @langnang-temp/php-server  | ====> |  develop  | ====> |  master  |
|  Sync from template  |       |       Sync to remote        |       |           |       |          |
└──────────────────────┘       └─────────────────────────────┘       └───────────┘       └──────────┘
```

### Sync to remote

```sh
# add remote url
git remote set-url --add origin [url]
# checkout the branch for sync
git checkout [branch]

git pull
# force push
git push -f
```
