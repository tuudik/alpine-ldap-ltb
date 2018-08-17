FROM alpine:latest

MAINTAINER tuudik <marko@radr.eu>, litewhatever <litewhatever@gmail.com>

#ENV VARIABLES
ENV LTB_VERSION=1.3 

# Install Apache2, PHP and LTB ssp
RUN apk --update add apache2 php7-apache2 php7-ldap php7-mcrypt php7-mbstring curl && \
    mkdir /usr/share/self-service-password/ && \
    curl https://ltb-project.org/archives/ltb-project-self-service-password-${LTB_VERSION}.tar.gz | tar -xz -C /usr/share/self-service-password/ --strip 1

# Clean trash.
RUN  rm -rf /var/lib/apt/lists/* && \
     rm -rf /var/cache/apk/* && \
     rm -rf /var/www/localhost/htdocs/*

# This is where configuration goes
RUN mkdir -p /etc/service/apache2 && \
    mkdir -p /run/apache2

RUN ln -sf /dev/stdout /var/log/apache2/ssp_access.log && \
    ln -sf /dev/stderr /var/log/apache2/ssp_error.log

ADD assets/config.inc.php /usr/share/self-service-password/conf/config.inc.php
ADD assets/env.helper.php /usr/share/self-service-password/conf/env.helper.php
ADD assets/self-service-password.conf /etc/apache2/conf.d/self-service-password.conf

COPY docker-ltb.sh /

ENTRYPOINT ["/docker-ltb.sh"]

EXPOSE 80

ARG BUILD_DATE
ARG VCS_REF
LABEL org.label-schema.build-date=$BUILD_DATE \
      org.label-schema.docker.dockerfile="/Dockerfile" \
      org.label-schema.license="MIT" \
      org.label-schema.name="alpine-ldap-ltb" \
      org.label-schema.vendor="tuudik" \
      org.label-schema.url="https://github.com/tuudik/alpine-ldap-ltb/" \
      org.label-schema.vcs-ref=$VCS_REF \
      org.label-schema.vcs-url="https://github.com/tuudik/alpine-ldap-ltb.git" \
      org.label-schema.vcs-type="Git"
