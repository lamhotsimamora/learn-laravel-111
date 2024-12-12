<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @include('@component/navbar')
    <br><br>
      

    <div class="container mx-auto" id="app">
        <!-- Main modal -->
        <div id="edit-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                     <div>
                         <label for="first_name"
                             class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                         <input type="text" v-model="name_edit" ref="name_edit"
                             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             placeholder="Name" required />
                     </div>
                     <div>
                         <label for="first_name"
                             class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                         <input type="text" v-model="email_edit" ref="email_edit"
                             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             placeholder="Email" required />
                     </div>
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button" @click="updateData"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    <button data-modal-hide="edit-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}


        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search
                :</label>
            <input type="text" v-model="search" ref="search" @keydown="enterSearch"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Serach" required />
        </div>
        <br>
        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
        <br><br>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in users" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @{{ data.name }}
                        </th>
                        <td class="px-6 py-4">
                            @{{ data.email }}
                        </td>
                        <td class="px-6 py-4">
                            <button @click="editData(data)" type="button" data-modal-target="edit-modal"
                                data-modal-toggle="edit-modal"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>

                            <button @click="deleteData(data.id)" type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">x</button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

       

      
    </div>

     <!-- Main modal -->
     <div id="default-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-2xl max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                     Add User
                 </h3>
                 <button type="button"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                     data-modal-hide="default-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-4 md:p-5 space-y-4">
                 <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                 <div>
                     <label for="first_name"
                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                     <input type="text" v-model="name" ref="name"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="Name" required />
                 </div>
                 <div>
                     <label for="first_name"
                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                     <input type="text" v-model="email" ref="email"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="Email" required />
                 </div>
                 </p>
             </div>
             <!-- Modal footer -->
             <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                 <button @click="saveData" type="button"
                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                 <button data-modal-hide="default-modal" type="button"
                     class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
             </div>
         </div>
     </div>
 </div>
 {{-- end modal --}}

    <script>
        var modal;

        const _TOKEN_ = "<?= csrf_token() ?>";
        new Vue({
            el: "#app",
            data: {
                users: null,
                search: null,
                name: null,
                email: null,
                name_edit : null,
                email_edit : null,
                id_edit : null
            },
            methods: {
                updateData : function(){
                    const $this = this;
                    if (this.name_edit == null || this.name_edit === '') {
                        this.$refs.name_edit.focus();
                        return;
                    }
                    if (this.email_edit == null || this.email_edit === '') {
                        this.$refs.email_edit.focus();
                        return;
                    }
                    axios.post('/update-user', {
                            _token: _TOKEN_,
                            name: this.name_edit,
                            email: this.email_edit,
                            id : this.id_edit
                        })
                        .then(function(response) {
                            var obj = response.data;
                            if (obj) {
                                $this.loadData()
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                saveData: function() {
                    const $this = this;
                    if (this.name == null || this.name === '') {
                        this.$refs.name.focus();
                        return;
                    }
                    if (this.email == null || this.email === '') {
                        this.$refs.email.focus();
                        return;
                    }
                    axios.post('/add-user', {
                            _token: _TOKEN_,
                            name: this.name,
                            email: this.email
                        })
                        .then(function(response) {
                            var obj = response.data;
                            if (obj) {
                                $this.loadData()
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                editData: function(data) {
                    this.name_edit = data.name;
                    this.email_edit = data.email;
                    this.id_edit = data.id;
                    modal.show()
                },
                deleteData: function(id) {
                    const $this = this;
                    axios.post('/delete-user', {
                            _token: _TOKEN_,
                            id: id
                        })
                        .then(function(response) {
                            var obj = response.data;
                            if (obj) {
                                $this.loadData()
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                enterSearch: function(e) {
                    if (e.keyCode == 13) {
                        this.searchData()
                    }
                },
                searchData: function() {
                    if (this.search == null || this.search === '') {
                        this.$refs.search.focus();
                        this.loadData()
                        return;
                    }
                    const $this = this;
                    axios.post('/search-users', {
                            _token: _TOKEN_,
                            search: this.search
                        })
                        .then(function(response) {
                            var obj = response.data;
                            if (obj) {
                                $this.users = obj;
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                loadData: function() {
                    const $this = this;
                    axios.post('/users', {
                            _token: _TOKEN_
                        })
                        .then(function(response) {
                            var obj = response.data;
                            if (obj) {
                                $this.users = obj;
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            },
            mounted() {
                this.loadData()
                const $targetEl = document.getElementById('edit-modal');

                // options with default values
                const options = {
                    placement: 'bottom-right',
                    backdrop: 'dynamic',
                    backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
                    closable: true,
                    onHide: () => {
                        console.log('modal is hidden');
                    },
                    onShow: () => {
                        console.log('modal is shown');
                    },
                    onToggle: () => {
                        console.log('modal has been toggled');
                    },
                };

                // instance options object
                const instanceOptions = {
                    id: 'edit-modal',
                    override: true
                };
                modal = new Modal($targetEl, options, instanceOptions);
            },
        })
    </script>

    <script></script>

</body>

</html>
