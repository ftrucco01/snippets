-- Function: manual_sequences_repair(boolean)

-- DROP FUNCTION manual_sequences_repair(boolean);

CREATE OR REPLACE FUNCTION manual_sequences_repair(_verbose_ boolean DEFAULT false)
  RETURNS void AS
$BODY$
-- Corrige todas las secuencias de todos los esquemas de la base de datos
-- seteando la secuencia al máximo valor de su columna asociada.
DECLARE
	R record;
	MAX_VALUE int;
BEGIN
	FOR R IN
		SELECT
			pg_namespace.nspname||'.'||pg_class.relname::text as table_name,
			pg_attribute.attname::text as column_name,
			substring(pg_get_expr(pg_attrdef.adbin, pg_attrdef.adrelid) from '%''#"%#"''%' for '#') as seq_name
		FROM
			pg_attrdef
			INNER JOIN pg_class ON (pg_class.oid = pg_attrdef.adrelid)
			INNER JOIN pg_attribute ON (pg_attribute.attrelid = pg_attrdef.adrelid AND pg_attribute.attnum = pg_attrdef.adnum)
			INNER JOIN pg_namespace ON (pg_namespace.oid = pg_class.relnamespace)
		WHERE
			pg_get_expr(pg_attrdef.adbin, pg_attrdef.adrelid) like 'nextval%'
	LOOP
		EXECUTE 'SELECT COALESCE(max('||R.column_name||'), 0) FROM '||R.table_name INTO MAX_VALUE;

		IF (MAX_VALUE > 0) THEN
			PERFORM setval(R.seq_name, MAX_VALUE);
		ELSE
			PERFORM setval(R.seq_name, 1, false);
		END IF;

		IF (_verbose_) THEN RAISE NOTICE 'SEQUENCE: % SET TO % ', R.seq_name, MAX_VALUE; END IF;
	END LOOP;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION manual_sequences_repair(boolean)
  OWNER TO postgres;
