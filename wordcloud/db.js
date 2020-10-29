$("#cloudcanvas").wordCloud({
	database: {
		dbHost: 'instabuilderdb.cmjbghjyygh8.ap-northeast-1.rds.amazonaws.com',
		dbUser: 'root',
		dbPass: 'superman12334667',
		dbName: 'instabuilder',
        selectFields: 'SELECT cate_name FROM hashtagscate',
        // <comma separated list of fields to select>
        tableName: 'instabuilder.hashtagscate'
        // <database table to select from>
	}
});


