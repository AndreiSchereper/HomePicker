<template>
    <form @submit.prevent="create">
      <div>
        <div>
          <label>Bedrooms</label>
          <input v-model.number="form.bedrooms" type="text" />
          <div v-if="form.errors.bedrooms">
            {{ form.errors.bedrooms }}
          </div>
        </div>
  
        <div>
          <label>Bathrooms</label>
          <input v-model.number="form.bathrooms" type="text" />
          <div v-if="form.errors.bathrooms">
            {{ form.errors.bathrooms }}
          </div>
        </div>
  
        <div>
          <label>Area</label>
          <input v-model.number="form.area" type="text" />
          <div v-if="form.errors.area">
            {{ form.errors.area }}
          </div>
        </div>
  
        <div>
          <label>City</label>
          <input v-model="form.city" type="text" />
          <div v-if="form.errors.city">
            {{ form.errors.city }}
          </div>
        </div>
  
        <div>
          <label>Postal Code</label>
          <input v-model="form.postal_code" type="text" />
          <div v-if="form.errors.postal_code">
            {{ form.errors.postal_code }}
          </div>
        </div>
  
        <div>
          <label>Street</label>
          <input v-model="form.street" type="text" />
          <div v-if="form.errors.street">
            {{ form.errors.street }}
          </div>
        </div>
  
        <div>
          <label>House Number</label>
          <input v-model="form.house_number" type="text" />
          <div v-if="form.errors.house_number">
            {{ form.errors.house_number }}
          </div>
        </div>
  
        <div>
          <label>Price</label>
          <input v-model="form.price" type="text" />
          <div v-if="form.errors.price">
            {{ form.errors.price }}
          </div>
        </div>
  
        <div>
          <button type="submit">Create</button>
        </div>
      </div>
    </form>
  </template>

  <script setup>
    import { useForm } from '@inertiajs/vue3';
    const form = useForm({
        bedrooms: 0,
        bathrooms: 0,
        area: 0,
        city: "",
        postal_code: null,
        street: null,
        house_number: null,
        price: 0,
    });
    const create = () => {
        form.post(route('listing.store'));
    }
  </script>
  