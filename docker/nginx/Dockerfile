FROM nginx:1.17

ENV TZ UTC

ARG APP_URL=localhost
COPY conf/default.conf /tmp
#RUN sed -i "http://localhost:8000" /tmp/default.conf
RUN cp -rf /tmp/default.conf /etc/nginx/conf.d/default.conf
COPY conf/nginx.conf /etc/nginx/nginx.conf