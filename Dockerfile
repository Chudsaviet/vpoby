FROM nginx:1.10.1-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache git

RUN  rm -r /usr/share/nginx/html \
    && cd /usr/share/nginx/ \
    && git clone --depth=1 --branch=master https://github.com/Chudsaviet/vpoby.git \
    && rm -r vpoby/.git vpoby/Dockerfile \
    && mv vpoby html \
    && apk del git
