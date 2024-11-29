## Installation and setup

Start docker containers:
```
docker compose up -d --build
```
<br />

Then navigate to <a href="http://localhost:8989/">localhost:8989</a> to see results.

### Usage
Put your csv file in "transaction files" folder. Then put path to your csv file in the call of `getInfo` function like this:
```
$data = getInfo('../transaction files/sample_1.csv');
```
<br />

Then you use `$data` variable in your front end app.