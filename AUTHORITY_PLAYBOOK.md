# CloseClient Elite - Master Documentation

Welcome to the **CloseClient Elite** theme repository. This is not just a WordPress theme; it is a high-performance **Authority Architecture** designed for top-tier coaches, consultants, and experts.

## 🚀 Theme Vision
Most expert websites act as passive brochures. **CloseClient Elite** transforms your digital presence into an active associate that:
1.  **Pre-qualifies leads** before they reach your calendar.
2.  **Positions your expertise** as the only logical solution in the market.
3.  **Closes premium clients** automatically through strategic content engineering.

---

## 🛠 Strategic Components

### 1. The "Big Domino" VSL
The Video Sales Letter (VSL) is the heart of the conversion funnel. The theme includes a pre-architected VSL section designed to handle the one "Big Domino" objection that stalls most sales.

### 2. Bento Grid Authority
Our specialized bento-box layouts (Portfolio, Services) provide a high-fidelity visual system that communicates dominance and competence instantly.

### 3. Vortex Intake Systems
All CTAs are mapped to the global #audit intake modal, ensuring a unified lead capture process with exit-intent triggers to minimize lost opportunities.

---

## 🏗 Development Standards

### Spacing & Layout
The theme uses a **Golden Ratio Spacing System** managed via CSS variables in `assets/css/main.css`.
-   `--s-2xl`: 233px
-   `--s-xl`: 144px
-   `--s-lg`: 89px
-   `--s-md`: 55px
-   `--s-sm`: 34px

### Interactions
All animations are hardware-accelerated using `translate3d`. The theme leverages:
-   **Magnetic Hover**: For buttons and social icons.
-   **Premium Glow**: Mouse-tracked radial gradients on cards.
-   **Intersection Observer**: Staggered reveal animations (`.reveal-stagger`).

### Customization
Every user-visible string, tag, and headline is 100% manageable via the **WordPress Customizer**. We maintain strict data parity between:
1.  `inc/customizer.php` (Live preview defaults)
2.  `inc/utilities.php` (Reset values)
3.  Template files (Fallback values)

---

## 📋 Installation & Setup

1.  **Install & Activate**: Standard WordPress theme installation.
2.  **Initialize Data**: Go to `Appearance > Customize > 5. Theme Setup & Tools`.
3.  **Generate Pages**: Click **'Generate Now'** to build the 10-page authority funnel automatically.
4.  **Configure CTA**: Set your booking link (Calendly, etc.) in the Customizer global settings.

---

## 🤖 For AI Engineers (AGENTS.md)
When working on this codebase, adhere to the following principles:
-   **No Inline Styles**: All design logic must reside in `assets/css/main.css`.
-   **Customizer First**: Never hardcode text. Use `get_theme_mod` with a synchronized fallback string.
-   **Verify Data Parity**: Use `/home/jules/self_created_tools/audit_defaults.py` to ensure settings are synchronized across all data states.
-   **Performance**: Use hardware-accelerated CSS transforms. Avoid JS for layout-heavy tasks.

---
*CloseClient Elite: Engineering the future of digital authority.*
