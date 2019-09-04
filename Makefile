serve:
	php -S 0.0.0.0:8080 -t web/

deploy:
	ssh -t deploy@178.62.15.88 -p 4444 'cd www/woocommerce-mondialrelay-demo; git pull origin master; composer update --no-dev;'