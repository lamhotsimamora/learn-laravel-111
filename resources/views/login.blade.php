<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/gh/lamhotsimamora/garuda-javascript@master/src/garuda.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>

    <div id="app" class="container mx-auto">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" v-model="username" ref="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required />
        </div>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" v-model="password" ref="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required />
        </div>
        <br>
        <button @click="login" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>

    </div>

    <script>
         const _TOKEN_ = "<?= csrf_token() ?>";
        new Vue({
            el : "#app",
            data : {
                username : null,
                password: null
            },
            methods: {
                login: function() {
                    if (this.username == null) {
                        this.$refs.username.focus();
                        return;
                    }
                    if (this.password == null) {
                        this.$refs.password.focus();
                        return;
                    }

                    __({
                        url: '/admin-login',
                        method: 'post',
                        data: {
                            username: this.username,
                            password: this.password,
                            _token: _TOKEN_
                        }
                    }).request($response => {

                        var obj = JSON.parse($response);
                        if (obj.result) {
                            Swal.fire({
                                title: "Login Success",
                                text: "Login {" + this.username + "} Success !",
                                icon: "success"
                            });
                            _saveStorage("username", this.username);
                            _saveStorage("password", this.password);
                            _refresh("/users");
                        } else {
                            Swal.fire({
                                title: "Login Failed",
                                text: "Login {" + this.username + "} Failed !",
                                icon: "error"
                            });
                        }
                    });

                }
            },
        })
    </script>
</body>
</html>