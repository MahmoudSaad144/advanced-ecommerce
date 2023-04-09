<style>
    :root {
        --accent: #FFA500;
        --color1: linear-gradient(to bottom right, #FFA500, #FF5F1F);
        --transparent: rgb(255, 255, 255, 0.3);
    }

    .modal.form {
        display: flex;
        flex-direction: column;
        width: 300px;
        height: 400px;
        background-color: var(--transparent);
        color: var(--accent);
        position: absolute;
        padding: 10px 30px;
        margin-top: 50px;
        backdrop-filter: blur(10px);
        border: 2px solid var(--transparent);
        border-radius: 16px;
        text-align: center;
    }

    .modal.form input {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 14px;
        margin: 10px 0;
        height: 40px;
        width: 296px;
        border: none;
        border-bottom: 1px solid var(--accent);
        background-color: transparent;
        outline: none;
    }

    .modal.form a {
        background: var(--color1);
        colrgb(134, 22, 22)EEEE;
        text-decoration: none;
        padding: 12px 0;
        margin: 20px 0 10px 0;
        text-align: center;
        border-radius: 30px;
        transition: 0.4s;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 20px;
    }

    .modal.form a:hover {
        transform: translatey(2px);
        box-shadow: none;
    }
</style>
<div class="form">

    <h2>Sign up</h2>

    <input type="email" placeholder="Your email">
    <input type="password" placeholder="Your password">
    <a href="_" type="button">Sign in</a>
    <p>or sign up with</p>

</div>
