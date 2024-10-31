<template>
    <v-layout class="rounded rounded-md">
        <v-system-bar color="grey-darken-3"></v-system-bar>

        <!-- <v-navigation-drawer
        color="grey-darken-2"
        width="72"
        permanent
      ></v-navigation-drawer> -->

        <v-navigation-drawer expand-on-hover rail color="grey-darken-1" width="200" permanent>
            <v-list>
                <v-list-item prepend-avatar="https://randomuser.me/api/portraits/women/1.jpg"
                    subtitle="snrypblc@gmailcom" title="Sinar"></v-list-item>
            </v-list>

            <v-divider>
            </v-divider>

            <v-list density="compact" nav>
                <router-link to="/"><v-list-item prepend-icon="mdi-folder" title="Data"
                        value="myData"></v-list-item></router-link>
                <router-link to="/tambahdatakk"><v-list-item prepend-icon="mdi-account-multiple" title="Input Data KK"
                        value="shared"></v-list-item></router-link>
                <router-link to="/tambahdataktp"><v-list-item prepend-icon="mdi-account-multiple" title="Input Data KTP"
                        value="starred"></v-list-item></router-link>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar color="grey-darken-1" height="48" flat></v-app-bar>


        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            <v-container>
                <v-card border="opacity-50 sm" class="mx-auto" max-width="1200" rounded="xl" variant="text">
                    <template v-slot:text>
                        <v-container>
                            <v-data-table :headers="headers" :items="kk" :sort-by="[{ key: 'id', order: 'asc' }]">
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <template v-slot:title>
                                            <div class="mb-5text-caption font-weight-bold ">Kartu Keluarga</div>
                                        </template>
                                        <v-divider class="mx-4" inset vertical></v-divider>
                                        <v-spacer></v-spacer>
                                        <router-link to="/tambahdatakk">
                                            <v-btn class="mb-2" color="primary" dark v-bind="props">
                                                Tambah Data
                                            </v-btn>
                                        </router-link>



                                        <v-dialog v-model="dialogDelete" max-width="500px">
                                            <v-card>
                                                <v-card-title class="text-h5">Apakah anda yakin ingin menghapus
                                                    data?</v-card-title>
                                                <v-card-actions>
                                                    <v-spacer></v-spacer>
                                                    <v-btn color="blue-darken-1" variant="text"
                                                        @click="closeDelete">Cancel</v-btn>
                                                    <v-btn color="blue-darken-1" variant="text"
                                                        @click="deleteItemConfirm">OK</v-btn>
                                                    <v-spacer></v-spacer>
                                                </v-card-actions>
                                            </v-card>
                                        </v-dialog>

                                    </v-toolbar>
                                </template>
                                <template v-slot:item.actions="{ item }">

                                    <v-icon class="me-2" size="small" @click="detail(item)">mdi-eye</v-icon>
                                    <v-icon size="small" @click="deleteKk(item)">mdi-delete</v-icon>
                                </template>
                            </v-data-table>
                        </v-container>
                    </template>
                </v-card>
            </v-container>
        </v-main>
    </v-layout>
</template>

<script>

export default {
    data() {
        return {
            dialog: false,
            dialogDelete: false,
            headers: [
                { title: 'No', align: 'start', key: 'id' },
                { title: 'NoKK', key: 'no_kk' },
                { title: 'Nama Kepala Keluarga', key: 'nama' },
                { title: 'Alamat', key: 'alamat' },
                { title: 'Kecamatan', key: 'kecamatan' },
                { title: 'Kabupaten/Kota', key: 'kabupaten_kota' },
                { title: 'Kode Pos', key: 'kode_pos' },
                { title: 'Provinsi', key: 'provinsi' },
                { title: 'Actions', key: 'actions' },
            ],
            desserts: [],
            editedIndex: -1,
            editedItem: {
                nokk: '',
                nama: '',
                alamat: '',
            },
            defaultItem: {
                nokk: '',
                nama: '',
                alamat: '',
            },
            kk: []
        }
    },


    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'Tambah  Data' : 'Edit Item';
        },
    },

    created() {
    },
    mounted() {
        this.getKk();
    },
    methods: {
        getKk() {
            const self = this;
            console.log(this.desserts, 'desser');
            axios({
                method: 'get',
                url: 'http://127.0.0.1:8000/api/kk/paginate',
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    console.log("ini respo", response);
                    self.kk = response.data.data;
                });
        },

        deleteKk(item) {
            const self = this;
            console.log(this.desserts, 'desser');
            axios({
                method: 'delete',
                url: 'http://127.0.0.1:8000/api/kk/' + item.id,
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    window.location.reload();
                    console.log("ini id", item.id)
                });
        },

        detail(item) {
            // this.editedIndex = this.desserts.indexOf(item);
            // this.editedItem = Object.assign({}, item);
            // this.dialog = true;
            this.$router.push(this.$route.path + "detail/" + item.id)
        },

        deleteItem(item) {
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        },

        deleteItemConfirm() {
            this.desserts.splice(this.editedIndex, 1);
            this.updateItemNumbers();
            this.closeDelete();
        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        save() {
            if (this.editedIndex > -1) {
                // Update item if editing
                Object.assign(this.desserts[this.editedIndex], this.editedItem);
            } else {
                // Add a new item with automatic numbering
                const newItem = { ...this.editedItem, no: String(this.desserts.length + 1) };
                this.desserts.push(newItem);
            }
            this.updateItemNumbers();
            this.close();
        },

        updateItemNumbers() {
            // Update all items' `no` based on their index
            this.desserts.forEach((item, index) => {
                item.no = String(index + 1);
            });
        },
    },
};
</script>
