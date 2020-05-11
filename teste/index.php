<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form method="post" action="controller.php">
        <div style="display:block">
            <label for="val1">Valor 1</label>
            <input type="text" name="val1" id="val1">
        </div>
        <div style="display:block">
            <label for="op">Operacao</label>
            <select name="op" id="op">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </div>
        <div style="display:block">
            <label for="val2">Valor 2</label>
            <input type="text" name="val2" id="val2">
        </div>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>