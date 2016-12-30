#!/bin/bash

##
# Author:          Pierre-Henry Soria <ph7software@gmail.com>
# Copyright:       (c) 2012-2016, Pierre-Henry Soria. All Rights Reserved.
# License:         GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
##

accepted_ext="-name '*.php' -or -name '*.css' -or -name '*.js' -or -name '*.html' -or -name '*.xml' -or -name '*.xsl' -or -name '*.xslt' -or -name '*.json' -or -name '*.yml' -or -name '*.tpl' -or -name '*.phs' -or -name '*.ph7' -or -name '*.sh' -or -name '*.sql' -or -name '*.ini' -or -name '*.md' -or -name '*.markdown' -or -name '.htaccess'"
exec="find . -type f \( $accepted_ext \) -print0 | xargs -0 perl -wi -pe"
eval "$exec 's/\s+$/\n/'"
eval "$exec 's/\t/    /g'"
