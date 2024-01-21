INSERT INTO users (
    email, pass, username, pfp
) VALUES (
    'test@testing.com',
    '04e418a00b165fdcbe5027c63a23e7e86aab463ed022353a0820a308187b68df',
    'GiornoGiovanna',
    'default'
);
-- password is "itestnow"

INSERT INTO relays (
    id, planet, relay_name
) VALUES
('MercuryHUB', 'Mercury', 'Larunda'),
('VenusHUB', 'Venus', 'Vesper'),
('EarthHUB', 'Earth', 'Strata'),
('MarsHUB', 'Mars', 'Maroo''s Bazaar'),
('SaturnHUB', 'Saturn', 'Kronia'),
('EuropaHUB', 'Europa', 'Leonov'),
('ErisHUB', 'Eris', 'Kuiper'),
('PlutoHUB', 'Pluto', 'Orcus');
