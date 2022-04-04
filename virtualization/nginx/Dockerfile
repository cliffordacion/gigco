FROM nginx:stable

RUN apt-get update && apt-get install -y procps

ENV TZ=Asia/Manila
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN rm /etc/nginx/conf.d/*