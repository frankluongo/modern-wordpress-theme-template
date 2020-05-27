import React from "react";
import Navigation from "../Navigation/Navigation";
import { NavWrapper } from "../../state/NavWrapper";

const Header = () => {
  return (
    <header>
      <NavWrapper>
        <Navigation />
      </NavWrapper>
    </header>
  );
};

export default Header;
