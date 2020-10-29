$("#cloudcanvas").wordCloud({
	database: {
		dbHost: 'instabuilderdb.cmjbghjyygh8.ap-northeast-1.rds.amazonaws.com',
		dbUser: 'root',
		dbPass: 'superman12334667',
		dbName: 'instabuilder',
        selectFields: 'cate_name',
        // <comma separated list of fields to select>
        tableName: 'hashtagcates'
        // <database table to select from>
	}
});


