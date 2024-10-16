export default defineNuxtRouteMiddleware((to, from) => {

    const store = useMyStore();
    
    if (!store.value.loggedIn) {
      return navigateTo('/auth/login');
    }

  });
  