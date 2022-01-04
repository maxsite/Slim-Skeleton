<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/maxsite/berry/dist/berry.css">
</head>

<body>
    <div class="layout-center pad50-tb">
        <?= $message ?>

        <form method="post">
            <div class="mar20-t">
                <label class="flex flex-vcenter flex-wrap">
                    <div class="flex-basis150px w100-phone">Name *</div>
                    <input class="flex-grow3 form-input" type="text" name="name" placeholder="name..." required>
                </label>
            </div>

            <div class="mar20-t">
                <label class="flex flex-vcenter flex-wrap">
                    <div class="flex-basis150px w100-phone">Email *</div>
                    <input class="flex-grow3 form-input" type="email" name="email" placeholder="email..." required>
                </label>
            </div>

            <div class="mar20-t flex">
                <div class="flex-basis150px hide-phone"></div>
                <div class="flex-grow3 w100-phone"><button class="button bg-blue500 hover-bg-blue600 t-blue100 hover-t-white" type="submit">Send</button></div>
            </div>
        </form>
    </div>

    <script>
        if (document.addEventListener) {
            document.addEventListener('invalid', function(e) {
                e.target.classList.add("js-form-invalid");
            }, true);
        }
    </script>

</body>

</html>