<template>
    <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2">
          <label class="label">Bedrooms</label>
          <input v-model.number="form.bedrooms" type="text" class="input"/>
          <div v-if="form.errors.bedrooms" class="input-error">
            {{ form.errors.bedrooms }}
          </div>
        </div>
  
        <div class="col-span-2">
          <label class="label">Bathrooms</label>
          <input v-model.number="form.bathrooms" type="text" class="input"/>
          <div v-if="form.errors.bathrooms" class="input-error">
            {{ form.errors.bathrooms }}
          </div>
        </div>
  
        <div class="col-span-2">
          <label class="label">Area</label>
          <input v-model.number="form.area" type="text" class="input"/>
          <div v-if="form.errors.area" class="input-error">
            {{ form.errors.area }}
          </div>
        </div>
  
        <div class="col-span-4">
          <label class="label">City</label>
          <input v-model="form.city" type="text" class="input"/>
          <div v-if="form.errors.city" class="input-error">
            {{ form.errors.city }}
          </div>
        </div>
  
        <div class="col-span-2">
          <label class="label">Postal Code</label>
          <input v-model="form.postal_code" type="text" class="input"/>
          <div v-if="form.errors.postal_code" class="input-error">
            {{ form.errors.postal_code }}
          </div>
        </div>
  
        <div class="col-span-4">
          <label class="label">Street</label>
          <input v-model="form.street" type="text" class="input"/>
          <div v-if="form.errors.street" class="input-error">
            {{ form.errors.street }}
          </div>
        </div>
  
        <div class="col-span-2">
          <label class="label">House Number</label>
          <input v-model="form.house_number" type="text" class="input"/>
          <div v-if="form.errors.house_number" class="input-error">
            {{ form.errors.house_number }}
          </div>
        </div>
  
        <div class="col-span-6">
          <label class="label">Price</label>
          <input v-model="form.price" type="text" class="input"/>
          <div v-if="form.errors.price" class="input-error">
            {{ form.errors.price }}
          </div>
        </div>
  
        <div class="col-span-6">
          <button type="submit" class="btn-primary">Create</button>
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
  