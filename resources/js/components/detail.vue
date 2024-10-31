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
                        value="Data"></v-list-item></router-link>
                <router-link to="/tambahdatakk"><v-list-item prepend-icon="mdi-account-multiple" title="Input Data KK"
                        value="shared"></v-list-item></router-link>
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
                    <template v-slot:title>
                        <div class="mb-5text-caption font-weight-bold ">Kartu Keluarga</div>
                    </template>

                    <template v-slot:text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.no_kk" label="NoKartuKeluarga"
                                        placeholder="NoKartuKeluarga" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.nama" label="NamaKepalaKeluarga"
                                        placeholder="NamaKepalaKeluarga" variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.alamat" label="Alamat" placeholder="Alamat"
                                        variant="underlined"></v-text-field>
                                </v-col>
                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.rt_rw" label="RT/RW" placeholder="RT/RW"
                                        variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.desa_kelurahan" label="Desa/Kelurahan"
                                        placeholder="Desa/Kelurahan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.kecamatan" label="Kecamatan"
                                        placeholder="Kecamatan" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.kabupaten_kota" label="Kabupaten/Kota"
                                        placeholder="Kabupaten/Kota" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.kode_pos" label="Kode Pos"
                                        placeholder="Kode Pos" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.provinsi" label="Provinsi"
                                        placeholder="Provinsi" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.shdk" label="StatusHubunganDalamKeluarga"
                                        placeholder="StatusHubunganDalamKeluarga" variant="underlined"></v-text-field>
                                </v-col><v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.ayah" label="Nama Ayah"
                                        placeholder="Nama Ayah" variant="underlined"></v-text-field>
                                </v-col>

                                <v-col cols="12" md="4" sm="6">
                                    <v-text-field readonly v-model="detailkk.ibu" label="Nama Ibu"
                                        placeholder="Nama Ayah" variant="underlined"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small class="text-caption text-medium-emphasis d-flex justify-space-between align-center">
                            <v-col cols="3" md="2" sm="4">
                            </v-col>
                            <v-col cols="3" md="2" sm="4">
                                <router-link :to="'/editdatakk/' + this.detailkk.id">
                                    <v-btn rounded="" block>Edit</v-btn>

                                </router-link>
                            </v-col>
                        </small>
                    </template>
                </v-card>
                <v-col></v-col>
                <v-card border="opacity-50 sm" class="mx-auto" max-width="1200" rounded="xl" variant="text">
                    <template v-slot:text>
                        <v-container>
                            <v-data-table :headers="headers" :items="ktp">
                                <template v-slot:top>
                                    <v-toolbar flat>
                                        <template v-slot:title>
                                            <div class="mb-5text-caption font-weight-bold ">Kartu Tanda Penduduk</div>
                                        </template>
                                        <v-divider class="mx-4" inset vertical></v-divider>
                                        <v-spacer></v-spacer>
                                        <router-link :to="'/tambahdataktp/' + this.$route.params.id">
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
                                    <router-link :to="'/detailktp/' + item.id">
                                        <v-icon class="me-2" size="small">mdi-eye</v-icon>
                                    </router-link>
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
    data() {
        return {
            id: null,
            dialog: false,
            dialogDelete: false,
            itemToDelete: null,
            headers: [
                { title: 'No', align: 'start', sortable: false, key: 'id' },
                { title: 'NIK', key: 'nik' },
                { title: 'Nama', key: 'nama' },
                { title: 'Jenis Kelamin', key: 'jenis_kelamin' },
                { title: 'Alamat', key: 'alamat' },
                { title: 'Kecamatan', key: 'kecamatan' },
                { title: 'Agama', key: 'agama' },
                { title: 'Status Perkawinan', key: 'status_perkawinan' },
                { title: 'Actions', key: 'actions', sortable: false },
            ],
            desserts: [],
            editedIndex: -1,
            // editedItem: {
            //     no_kk: '',
            //     nama: '',
            //     alamat: '',
            // },
            // defaultItem: {
            //     no_kk: '',
            //     nama: '',
            //     alamat: '',
            // },
            detailkk: [],
            ktp: [],
            idku: null,
        }
    },

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'New Item' : 'Edit Item';
        },
    },

    created() {
    },
    mounted() {
        this.getdetailKk();

    },
    methods: {
        getdetailKk() {
            const self = this;
            self.id = this.$route.params.id
            console.log(this.desserts, 'desser');
            axios({
                method: 'get',
                url: 'http://127.0.0.1:8000/api/kk/' + self.id,
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    console.log("ini respo", response);
                    self.detailkk = response.data[0];
                    self.ktp = response.data[0].ktp;
                })
        },

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
            // this.editedIndex = this.desserts.indexOf(item);
            // this.editedItem = Object.assign({}, item);
            // this.dialog = true;
            // this.$router.push(this.$route.path + "/" + item.id)
        },

        editItem2() {
            // this.editedIndex = this.desserts.indexOf(item);
            // this.editedItem = Object.assign({}, item);
            // this.dialog = true;
            this.$router.replace("editdatakk/" + 1)
        },

        deleteKTP(item) {
            const self = this;
            console.log(this.desserts, 'desser');
            axios({
                method: 'delete',
                url: 'http://127.0.0.1:8000/api/ktp/' + item.id,
                headers: {
                    Accept: 'application/json'
                }
            })
                .then(function (response) {
                    window.location.reload();
                    console.log("ini id", item.id)
                });
        },

        deleteItem(item) {
            this.itemToDelete = item;
            this.dialogDelete = true;
        },

        deleteItemConfirm() {
            if (this.itemToDelete) {
                this.deleteKTP(this.itemToDelete); // Panggil fungsi untuk menghapus item
            }
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
            this.dialogDelete = false; // Menyembunyikan dialog
            this.itemToDelete = null;
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
