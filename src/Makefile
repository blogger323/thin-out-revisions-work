PHPDIR    = /cygdrive/c/xampp-portable/php
WPTOOLDIR = c:/xampp-portable/wordpress/tools
TORDIR    = /cygdrive/c/xampp-portable/wordpress/wp-content/plugins/thin-out-revisions
TORDIR2   = c:/xampp-portable/wordpress/wp-content/plugins/thin-out-revisions
LANGDIR   = $(TORDIR)/languages

$(LANGDIR)/thin-out-revisions-ja-new.po : $(LANGDIR)/thin-out-revisions.pot
	msgmerge -o $(LANGDIR)/thin-out-revisions-ja-new.po $(LANGDIR)/thin-out-revisions-ja.po $(LANGDIR)/thin-out-revisions.pot

$(LANGDIR)/thin-out-revisions.pot : $(TORDIR)/thin-out-revisions.php
	$(PHPDIR)/php $(WPTOOLDIR)/makepot.php wp-plugin $(TORDIR2) $(TORDIR2)/languages/thin-out-revisions.pot

