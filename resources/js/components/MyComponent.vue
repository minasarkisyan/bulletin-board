<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Component</div>

                <div class="card-body bg-primary">
                    Это новый компонент
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('My Component mounted.')
        }
    }
</script>
