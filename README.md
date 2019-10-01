Very simple set up of codeception plus docker-compose that uses
codeception and selenium images


To run tests

Pull images:

```
cd docker && docker-compose up docker-compose
```

Generate helpers

```
docker-compose run --rm codecept build
```

Run tests 

```
docker-compose run --rm codecept run acceptance
```

Development bash

```
docker-compose run --rm --entrypoint bash codecept
```