<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Toggle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            /* Màu nền mặc định là trắng */
            background-color: white;
            color: #0d1117;
            /* Hiệu ứng chuyển đổi mượt mà */
            transition: background-color 0.5s ease-in-out;
        }

        .dark-mode {
            /* Màu nền tối */
            background-color: #e9eec2;
            color: black;
        }

        .icon-large {
            font-size: 25px;
            /* Tăng kích thước biểu tượng */
        }
    </style>
</head>

<body>
    <!-- Biểu tượng mặt trời và mặt trăng -->
    <!-- <i class="fa-regular fa-sun icon-large" onclick="toggleTheme('light')"></i>
    <i class="fa-regular fa-moon icon-large" onclick="toggleTheme('dark')"></i> -->

    <script>
        function toggleTheme(theme) {
            const element = document.body;
            if (theme === 'dark') {
                element.classList.add("dark-mode");
            } else { // theme === 'light'
                element.classList.remove("dark-mode");
            }
        }
    </script>
</body>

</html>