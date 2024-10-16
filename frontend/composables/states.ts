export const useMyStore = () => {

    const store = useState("mystore", () => ({ 
        
        loggedIn: false, 
        breweriesTotal: 8323 
    
    }));

    const token = useCookie("auth_token");

    if (token.value) {
        store.value.loggedIn = true;
    } else {
        store.value.loggedIn = false;
    }

    return store;
};
