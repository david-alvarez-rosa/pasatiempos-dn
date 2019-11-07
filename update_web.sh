#!/bin/bash


cd /home/david

rm -r pasatiempos-dn
rm pasatiempos-dn.zip

rm /srv/http/pasatiempos.com/código/pasatiempos-dn.zip
cp -r /srv/http/pasatiempos.com pasatiempos-dn
rm pasatiempos-dn/pendiente.org
rm -r pasatiempos-dn/.git 

zip -r pasatiempos-dn pasatiempos-dn

cp pasatiempos-dn.zip /srv/http/pasatiempos.com/código/

rm -r pasatiempos-dn
rm pasatiempos-dn.zip

cp -r /srv/http/pasatiempos.com pasatiempos-dn
rm pasatiempos-dn/pendiente.org
rm -r pasatiempos-dn/.git 

zip -r pasatiempos-dn pasatiempos-dn
