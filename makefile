push:
	@git add .
	@git reset db.json 
	@git reset makefile
	@git commit -m "pushed success"
	@git push origin HEAD:main
