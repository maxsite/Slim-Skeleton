<!DOCTYPE html>
<html>
<h1>Sample form</h1>

<?= $message ?>

<div>
    <form method="POST">
        <div><label>Name: <input type="text" name="name"></label></div>
        <div><label>Email: <input type="email" name="email"></label></div>
        <div><button type="submit">Send</button></div>
    </form>
</div>

</html>