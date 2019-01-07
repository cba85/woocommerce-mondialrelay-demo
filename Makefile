serve:
	php -S 0.0.0.0:8080 -t web/

deploy:
	git push dokku master