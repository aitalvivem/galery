<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Jeu</div>

                    <div class="card-body">
                        coucou
                        <tr v-for="profil in profils" :key="profil.id">
                            <td>{{ profil.name }}<td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
