import React, { useEffect, useState } from "react";
import Navigation from "../Navigation";
import { dataService } from "../../services/dataService";

const Application = () => {
  const [navLinks, setNavLinks] = useState({});
  useEffect(() => {
    async function fetchData() {
      const data = await dataService("/wp-json/menus/v1/menus/primary-menu");
      setNavLinks(data);
    }
    fetchData();
  }, []);

  return (
    <section>
      <Navigation items={navLinks} />
    </section>
  );
};

export default Application;
