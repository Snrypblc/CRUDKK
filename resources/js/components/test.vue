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
                <v-list-item prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg" subtitle="sinar@gmailcom"
                    title="Sinar"></v-list-item>
            </v-list>

            <v-divider>
            </v-divider>

            <v-list density="compact" nav>
                <v-list-item prepend-icon="mdi-folder" title="My Files" value="myfiles"></v-list-item>
                <v-list-item prepend-icon="mdi-account-multiple" title="Input Data KK" value="shared"></v-list-item>
                <v-list-item prepend-icon="mdi-account-multiple" title="Input Data KTP" value="starred"></v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar color="grey-darken-1" height="48" flat></v-app-bar>
        <!--
        <v-navigation-drawer color="grey-lighten-2" location="right" width="150" permanent></v-navigation-drawer> -->

        <!-- <v-app-bar color="grey-darken-1" height="48" location="bottom" flat></v-app-bar> -->

        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            <v-container>
                <v-card border="opacity-50 sm" class="mx-auto" max-width="1200" rounded="xl" variant="text">
                    <template v-slot:text>
                        <v-container>
                            <v-data-table :headers="headers" :items="desserts"
                                :sort-by="[{ key: 'calories', order: 'asc' }]">
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <template v-slot:title>
                                            <div class="mb-5text-caption font-weight-bold ">Kartu Tanda Penduduk</div>
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
                                    <router-link to="/detail">
                                        <v-icon class="me-2" size="small"
                                            @click="editItem(item)">mdi-eye</v-icon></router-link>
                                    <v-icon size="small" @click="deleteItem(item)">mdi-delete</v-icon>
                                </template>
                                <template v-slot:no-data>
                                    <v-btn color="primary" @click="initialize">Reset</v-btn>
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
    data: () => ({
        dialog: false,
        dialogDelete: false,
        headers: [
            { title: 'No', align: 'start', sortable: false, key: 'no' },
            { title: 'NIK', key: 'nik' },
            { title: 'Nama', key: 'nama' },
            { title: 'Jenis Kelamin', key: 'kelamin' },
            { title: 'Alamat', key: 'alamat' },
            { title: 'Kecamatan', key: 'kecamatan' },
            { title: 'Agama', key: 'agama' },
            { title: 'Status Perkawinan', key: 'status' },
            { title: 'Actions', key: 'actions', sortable: false },
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
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
        },
    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            this.desserts = [
            { no: '1', nik: '3324031910030005', nama: 'Sinar', lahir: 'Kendal, 19-10-2003', kelamin: 'Laki Laki', darah: 'o', alamat: 'Pesaren', rtrw: '002/003', desa: 'Pesaren', kecamatan: 'Sukorejo', agama: 'Islam', status: 'Belum Kawin', pekerjaan: 'Teroris', kewarganegaraan: 'Yaman' },
                { no: '2', nik: '3324031910030005', nama: 'Sinar', lahir: 'Kendal, 19-10-2003', kelamin: 'Laki Laki', darah: 'o', alamat: 'Pesaren', rtrw: '002/003', desa: 'Pesaren', kecamatan: 'Sukorejo', agama: 'Islam', status: 'Belum Kawin', pekerjaan: 'Teroris', kewarganegaraan: 'Yaman' },
                { no: '3', nik: '3324031910030005', nama: 'Sinar', lahir: 'Kendal, 19-10-2003', kelamin: 'Laki Laki', darah: 'o', alamat: 'Pesaren', rtrw: '002/003', desa: 'Pesaren', kecamatan: 'Sukorejo', agama: 'Islam', status: 'Belum Kawin', pekerjaan: 'Teroris', kewarganegaraan: 'Yaman' },
                { no: '4', nik: '3324031910030005', nama: 'Sinar', lahir: 'Kendal, 19-10-2003', kelamin: 'Laki Laki', darah: 'o', alamat: 'Pesaren', rtrw: '002/003', desa: 'Pesaren', kecamatan: 'Sukorejo', agama: 'Islam', status: 'Belum Kawin', pekerjaan: 'Teroris', kewarganegaraan: 'Yaman' },
                { no: '5', nik: '3324031910030005', nama: 'Sinar', lahir: 'Kendal, 19-10-2003', kelamin: 'Laki Laki', darah: 'o', alamat: 'Pesaren', rtrw: '002/003', desa: 'Pesaren', kecamatan: 'Sukorejo', agama: 'Islam', status: 'Belum Kawin', pekerjaan: 'Teroris', kewarganegaraan: 'Yaman' },
            ];
        },

        editItem(item) {
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
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
