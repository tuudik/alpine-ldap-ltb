[![](https://dockerbuildbadges.quelltext.eu/status.svg?organization=tuudik&repository=alpine-ldap-ltb)](https://hub.docker.com/r/tuudik/alpine-ldap-ltb/builds/)

# What is ldap-ltb?

ldap-ltb is a wrapper for the LDAP Tool Box (LTB) Self Service Password utility, 
which is a PHP application that allows users to change their password in an LDAP directory. 

# How to use this image

The easiest for to run ldap-ltb image is as follow:
```
      $ docker run --name=<your-container-name> -dt \
        -e LDAP_URL="<your-ldap-url>" \
        -e LDAP_BINDPW="<your-ldap-admin-password>" \
        --net=<your-network-name> \
        accenture/adop-ldap-ltb:VERSION
```
after the above ldap-ltb will be available at: http://ldap-ltb
        
# Configuration

The service configuration is externalised and stored the 'assets' directory.

Runtime configuration can be provided using all variables defined in assets/config.inc.php as environment variables:

* LDAP_URL, the LDAP URI, i.e. ldap-host:389
* LDAP_BASE, the LDAP user BASE_DN
* LDAP_BINDDN, the LDAP admin DN
* LDAP_BINDPW, the password to use connecting to LDAP service

# Supported Docker versions

This image is officially supported on Docker version 1.9.1.

# User feedback

## Documentation
Documentation for this image is available in the [LDAP Tool Box page](http://ltb-project.org/wiki/documentation/self-service-password). 
Additional documentaion can be found under the [`docker-library/docs` GitHub repo](https://github.com/docker-library/docs). Be sure to familiarize yourself with the [repository's `README.md` file](https://github.com/docker-library/docs/blob/master/README.md) before attempting a pull request.

## Contribute
You are invited to contribute new features, fixes, or updates, large or small; we are always thrilled to receive pull requests, and do our best to process them as fast as we can.

Before you start to code, we recommend discussing your plans through a [GitHub issue](https://github.com/Accenture/ldap-ltb/issues), especially for more ambitious contributions. This gives other contributors a chance to point you in the right direction, give you feedback on your design, and help you find out if someone else is working on the same thing.
