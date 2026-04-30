# CloseClient AI Engineering Guidelines

This file provides critical context and constraints for AI agents and software engineers working on the CloseClient Elite WordPress theme. Adherence to these standards is mandatory to maintain the theme's high-fidelity positioning and architectural integrity.

## 🏛 Core Philosophy: The Authority System
CloseClient is not a "blog" theme; it is a **conversion engine** for high-ticket experts. Every change should prioritize:
1.  **Elite Aesthetics**: Minimalism, high contrast, and premium spacing.
2.  **Conversion Velocity**: Frictionless lead capture and authority proof.
3.  **Total Manageability**: Zero code required for the end-user to change content.

---

## 💻 Technical Standards

### 1. Style & Design Logic
-   **Strict No-Inline Policy**: Never use `style="..."` in PHP templates.
-   **Centralization**: All CSS must reside in `assets/css/main.css`.
-   **Fluid Design**: Use fluid variables (`--s-xl`, `--s-lg`, etc.) for all spacing. Never use static pixel values for margins or padding.
-   **Bento Grid**: Use the utility class system (`.bento-grid`, `.bento-span-*`) for all grid layouts.

### 2. Data Synchronization (The Single Source of Truth)
We maintain a "Triple-Lock" synchronization for every theme setting:
-   **Customizer**: The default in `inc/customizer.php` must match the desired "Elite" copy.
-   **Utilities**: The reset value in `inc/utilities.php` must be identical.
-   **Templates**: The second argument of `get_theme_mod()` (the fallback) must be identical.

**Tooling**: Use `python3 /home/jules/self_created_tools/audit_defaults.py` to verify this parity. **Never submit code with synchronization discrepancies.**

### 3. High-Performance Interactions
-   **Magnetic Effects**: Apply `.cc-button` or `.social-icon` for automatic magnetic tracking.
-   **Reveal Animations**: Wrap content in `.reveal` or `.reveal-stagger` for Intersection Observer-driven entry.
-   **Hardware Acceleration**: Always use `translate3d` for transform-based animations to ensure 60fps performance on mobile.

### 4. SEO & Semantics
-   Each page MUST have exactly one `<h1>`.
-   Use `itemscope` and `itemtype` for schema.org structured data.
-   All images must have accessible `alt` tags, preferably manageable via Customizer.

---

## 🎯 Implementation Checklist for New Sections
If you are adding a new section:
1.  [ ] Create the template part in `template-parts/sections/section-`.
2.  [ ] Register all strings in `inc/customizer.php`.
3.  [ ] Add default values to `closeclient_reset_defaults` in `inc/utilities.php`.
4.  [ ] Register a shortcode for the section in `inc/shortcodes.php`.
5.  [ ] Add the section toggle and content fields to the Customizer UI.
6.  [ ] Run `audit_defaults.py` to confirm synchronization.

---
*Follow these guidelines to engineer world-class authority.*
