import React, { createContext, useEffect, useState, useContext } from "react";
import { dataService } from "../services/dataService";

const defaultValues = {
  items: [],
};

export const NavContext = createContext(defaultValues);

export const NavWrapper = ({ children }) => {
  const [navLinks, setNavLinks] = useState([]);

  useEffect(() => {
    async function fetchData() {
      const { items } = await dataService(
        "/wp-json/menus/v1/menus/primary-menu"
      );
      setNavLinks(items);
    }
    fetchData();
  }, []);

  return (
    <NavContext.Provider
      value={{
        items: navLinks,
      }}
    >
      {children}
    </NavContext.Provider>
  );
};

export const useNavState = () => useContext(NavContext);
