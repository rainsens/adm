<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component. Yes it is. ok. Okay.
                        {{ number }}
                        <button @click="plus">加2</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    	data() {
    		return {
    			number: 1
            }
        },
        methods: {
    		plus () {
    			this.number+=10;
            }
        },
        mounted() {
        
        }
    }
</script>
