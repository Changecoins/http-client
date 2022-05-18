help:
	@echo "\033[92m make all     - Run all commands"
	@echo "\033[92m make unit    - Run unit tests"
	@echo "\033[92m make analyze - Use static analyzing tool to analyze code"
	@echo "\033[92m make fix     - Apply code style fixer"

all: fix analyze unit

unit:
	php vendor/bin/phpunit
analyze:
	php vendor/bin/psalm
fix:
	php vendor/bin/phpcs


