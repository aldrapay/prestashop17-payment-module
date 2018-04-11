SHELL=/bin/bash
all:
	if [[ -e prestashop17-aldrapay.zip ]]; then rm prestashop17-aldrapay.zip; fi
	zip -r prestashop17-aldrapay.zip aldrapay -x "*/.git/*" -x "*/examples/*" -x "*.git*" -x "*.project*" -x "*.travis*" -x "*.build*" 
