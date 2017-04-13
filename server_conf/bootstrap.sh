#!/usr/bin/env bash

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 7
sudo apt-get install -y apache2

sudo apt-get install software-properties-common python-software-properties
sudo add-apt-repository ppa:ondrej/php

sudo apt-get update





